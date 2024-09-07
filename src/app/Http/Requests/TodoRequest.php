<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => ['required','string','max:20']
        ];
    }

    public function messages()
    {
        return[
            'content.required' =>'Todoを入力してください',
            'conrtent.string' =>'Todoを文字列で入力してください',
            'content.max' =>'Todoを20文字以下で入力してください',
        ];
    }

    public function update(TodoRequest $request)
    {
    $todo = $request->only(['content']);
    Todo::find($request->id)->update($todo);

    return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function delete(TodoRequest $request)
    {
    $todo = $request->only(['content']);
    Todo::find($request->id)->delete($todo);

    return redirect('/')->with('message', 'Todoを削除しました');
    }
}