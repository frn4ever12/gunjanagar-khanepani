@extends('layouts.frontend')

@section('title', 'FAQs')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">{{ __('messages.frequently_asked_questions') }}</h1>
        <p class="lead text-muted">{{ __('messages.faqs_subtitle') }}</p>
    </div>
    
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="accordion" id="faqAccordion">
                @foreach($faqs as $index => $faq)
                <div class="accordion-item border-0 shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                            {{ app()->getLocale() === 'ne' ? $faq->question_ne : $faq->question_en }}
                        </button>
                    </h2>
                    <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p class="mb-0" style="white-space: pre-line;">{{ app()->getLocale() === 'ne' ? $faq->answer_ne : $faq->answer_en }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
