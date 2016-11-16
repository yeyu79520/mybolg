<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
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
        return [
            'cid'=>'required|integer',
            'title' => 'required|min:2',
            'content'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'cid.required'=>'请选择分类',
            'title.required' => '请输入标题',
            'content.required'=>'请输入内容'
        ];
    }
}
