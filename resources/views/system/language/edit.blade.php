@extends('avored::layouts.app')

@section('meta_title')
    {{ __('avored::system.language.edit.title') }}: AvoRed E commerce Admin Dashboard
@endsection

@section('page_title')
    {{ __('avored::system.language.edit.title') }}
@endsection

@section('content')
<a-row type="flex" justify="center">
    <a-col :span="24">
        <language-save base-url="{{ asset(config('avored.admin_url')) }}" :language="{{ $language }}" inline-template>
        <div>
            <a-form 
                :form="languageForm"
                method="post"
                action="{{ route('admin.language.update', $language->id) }}"                    
                @submit="handleSubmit"
            >
                @csrf
                @method('put')
                @include('avored::system.language._fields')

                
                <a-form-item>
                    <a-button
                        type="primary"
                        html-type="submit"
                    >
                        {{ __('avored::system.btn.save') }}
                    </a-button>
                    
                    <a-button
                        class="ml-1"
                        type="default"
                        v-on:click.prevent="cancelLanguage"
                    >
                        {{ __('avored::system.btn.cancel') }}
                    </a-button>
                </a-form-item>
            </a-form>
            </div>
        </language-save>
    </a-col>
</a-row>
@endsection