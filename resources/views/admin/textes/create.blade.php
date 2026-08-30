@extends('layouts.admin')

@section('title', __('messages.add_text'))

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">{{ __('messages.add_text') }}</h2>

    <form action="{{ route('textes.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('messages.title_fr') }}</label>
            <input type="text" name="titre_fr" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.title_ar') }}</label>
            <input type="text" name="titre_ar" class="form-control" dir="rtl" required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.number') }}</label>
            <input type="text" name="numero" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.publication_date') }}</label>
            <input type="date" name="date_publication" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.category') }}</label>

            <select name="categorie_id" class="form-select" required>

                <option value="">
                    -- {{ __('messages.choose_category') }} --
                </option>

                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">
                        {{ app()->getLocale() == 'ar'
                            ? $categorie->nom_ar
                            : $categorie->nom_fr }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.domain') }}</label>

            <select name="domaine_id" class="form-select" required>

                <option value="">
                    -- {{ __('messages.choose_domain') }} --
                </option>

                @foreach($domaines as $domaine)
                    <option value="{{ $domaine->id }}">
                        {{ app()->getLocale() == 'ar'
                            ? $domaine->nom_ar
                            : $domaine->nom_fr }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.content_fr') }}</label>
            <textarea name="contenu_fr" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.content_ar') }}</label>
            <textarea name="contenu_ar" class="form-control" rows="5" dir="rtl" required></textarea>
        </div>

        <div class="mb-3">
           <label class="form-label">{{ __('messages.pdf_file') }}</label>

           <div class="input-group">
              <label for="pdf_file" class="btn btn-outline-secondary">
                {{ __('messages.choose_file') }}
              </label>

              <input
                type="text"
                id="file_name"
                class="form-control"
                value="{{ __('messages.no_file_selected') }}"
                readonly>

              <input
                type="file"
                name="lien_pdf"
                id="pdf_file"
                accept=".pdf"
                hidden>
           </div>
        </div>

       <script>
          document.getElementById('pdf_file').addEventListener('change', function () {
          const fileName = this.files.length
            ? this.files[0].name
            : "{{ __('messages.no_file_selected') }}";

           document.getElementById('file_name').value = fileName;
         });
       </script>

        <button type="submit" class="btn btn-success">
            {{ __('messages.save') }}
        </button>

        <a href="{{ route('textes.index') }}" class="btn btn-secondary">
            {{ __('messages.cancel') }}
        </a>

    </form>

</div>

@endsection