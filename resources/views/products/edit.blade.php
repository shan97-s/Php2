<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.update', $chirp) }}">
            @csrf
            @method('patch')
            <table>
            <tr>
            <td>
            <p>Name</p>
            <x-text-input  class="block mt-1 w-full" type="text" name="name"  />
            </td>
            <td>
            <p>Description</p>
            <x-text-input  class="block mt-1 w-full" type="text" name="description"  />
            </td>
            <td>
            <p>Price</p>
            <x-text-input  class="block mt-1 w-full" type="text" name="price"  />
            </td>
            </tr>
            </table>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('products.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>