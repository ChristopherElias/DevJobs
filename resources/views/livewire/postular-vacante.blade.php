<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">

    @if (session()->has('mensaje'))
        
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold
                    p-2 my-5 text-sm rounded-lg">
            {{ session('mensaje') }}
        </p>

    @elseif ($postulado > 0)

        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold
            p-2 my-5 text-sm rounded-lg">
            Ya te has postulado para esta vacante!
        </p>

    @else

        <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

        <form wire:submit.prevent="postularme" class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida')" />
                <x-text-input id="cv" wire:model="cv" type="file" accept=".pdf" class="block mt-1 w-full"/>

                @error('cv')
                    <livewire:mostrar-alerta :message="$message">
                @enderror

                <x-primary-button class="my-5">
                    {{ __('Postularme') }}
                </x-primary-button> 
            </div>
        </form>

    @endif


</div>
