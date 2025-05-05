<?php

namespace App\Http\Requests;

use App\Rules\SlugRule;
use App\Rules\KeywordRule;
use App\Rules\Publish_date_Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true; // to determain current user authorizatoin 
        /*
        HERE IS AN EXAMPLE:
            return Auth::user()->name == is_Admin  ;
            // if current user is an admin the request will excuted and implements the rules //
        */
    }

    public function rules(): array
    {
        $rules=[
            'title'=> ['nullable','string' , 'max:255'] ,
            'slug'=>['nullable' ,'string' , 'max:255' , 'unique:posts,slug'] ,
            'body'=>['required','string'] ,
            'is_published'=>['required' , 'boolean'] ,
            'publish_date'=>['nullable'  , 'date' , new Publish_date_Rule()] ,
            'meta_description' =>['string' , 'nullable' , 'max:255' ],
            'tags'=>['string' , 'max:200' , 'nullable'] ,
            'keywords'=>['nullable' , 'string', new KeywordRule(5)] ,
        ];
        if($this->filled('slug') =="")
        {
            $rules['slug']=new SlugRule();
        }
    return $rules ;
    }
    public function messages()
    {
        return [
            'title.string'=> 'Title should be a string' ,
            'slug.unique' => 'This slug should be unique !' ,
            'body.required'=> 'Body is required' ,
            'is_published.required'=> 'is_published is required' ,
            'is_published.boolean'=> 'is_published should be boolean ' ,
        ];
    }
    public function attributes()
    {
        return[
            'title' =>'address',
            'slug' => 'short_link',
            'body' => 'content'
        ];
    }
    public function prepareForValidation()
    {
        
        if($this->slug == null && $this->title){
            $this->merge([
                'slug'=>strtolower($this->title).'1a2b3c-'
            ]);
        }
        if ($this->tags && $this->keywords) {
            $this->merge([
                'meta_description' => $this->tags . ' , ' . $this->keywords,
            ]);
        }
    }

    protected function passedValidation()
    {
        Log::info('Verification Done Successfully !');
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
            'success' =>false ,
            'message' => 'validation_error',
            'errors' => $validator->errors(),
        ], 422));
    }

}