<?php

namespace Pdusan\SimpleBlog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;

class SBlogPostRequest extends FormRequest
{
    protected $action;

    public function __construct(Request $request, Factory $factory)
    {
        $this->action = !empty($request->route()->getName()) ? $request->route()->getName() : '';
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules['title'] = ['required', 'string', 'max:191'];
        $rules['body'] = ['required', 'string'];
        $rules['category_id'] = ['required', 'numeric'];
        $rules['tags'] = ['nullable', 'string'];
        return $rules;
    }

    public function attributes()
    {
        $attributes = parent::attributes();
        $attributes['title'] = 'Title';
        $attributes['body'] = 'Detail';
        $attributes['category_id'] = 'Category';
        $attributes['tags'] = 'Tags';
        return $attributes;
    }

}
