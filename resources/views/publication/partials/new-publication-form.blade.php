<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
</head>
<body>
    <section>
        <form action="{{ route('publication.create') }}" method="POST"> 
            @csrf      
            @method('post')

            <div>
              <x-input-label for="title" :value="__('Título')" />
              <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
              <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
              <x-input-label for="description" :value="__('Descripción')" />
              <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required autofocus autocomplete="description" />
              <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div>
              <x-input-label for="photo" :value="__('Foto')" />
              <x-text-input id="imagen" name="imagen" type="text" class="mt-1 block w-full" required autofocus autocomplete="imagen" />
              <x-input-error class="mt-2" :messages="$errors->get('imagen')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Postear') }}</x-primary-button>
            </div>
        </form>  
    </section>
</body>
</html>