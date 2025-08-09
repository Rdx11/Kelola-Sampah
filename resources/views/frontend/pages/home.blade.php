@extends('frontend.layouts.app')

@section('title')
Home
@endsection

@section('content')
<x-sections.hero></x-sections.hero>

<x-sections.tentang></x-sections.tentang>

<x-sections.panduan></x-sections.panduan>

<x-sections.manfaat></x-sections.manfaat>

<x-sections.gallery></x-sections.gallery>

<x-sections.artikel :articles="$articles"></x-sections.artikel>

<x-sections.laporan></x-sections.laporan>

<x-sections.kontak></x-sections.kontak>

<x-sections.faq></x-sections.faq>
@endsection