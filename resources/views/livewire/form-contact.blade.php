<form method="post" wire:submit.prevent="send">
    <div class="antialiased text-gray-900 px-6">
        <div class="max-w-xl mx-auto py-12 divide-y md:max-w-4xl">
            <div class="py-12">
                <h2 class="text-2xl font-bold">Formulário de e-mail</h2>
                <div wire:loading wire:target="send"  class="z-50 static center flex w-full bg-gray-400 bg-opacity-50">
                    <img src="https://paladins-draft.com/img/circle_loading.gif" width="64" height="64" class="m-auto mt-1/4">
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">Nome</span>
                            <input name="name" id="name" type="text" class="mt-1 block w-full" placeholder="Nome" wire:model="name" />
                            @error('name') {{ $message }}@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">E-mail</span>
                            <input type="text" name="email" id="email" class="mt-1 block w-full" placeholder="email@example.com" wire:model="email" />
                            @error('email') {{ $message }}@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Telefone</span>
                            <input type="text" name="phone" id="phone" class="mt-1 block w-full" placeholder="00 00000-0000" wire:model="phone" />
                            @error('phone') {{ $message }}@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Anexo</span>
                            <input type="file" class="mt-1 block w-full border-solid" name="document" id="document" wire:model="document" />
                            @error('document') {{ $message }}@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Menssagem</span>
                            <textarea class="mt-1 block w-full" rows="3" wire:model="message"></textarea>
                            @error('message') {{ $message }}@enderror
                        </label>
                        <div class="grid gap-2">
                            <button type="submit"
                                class="uppercase px-8 py-2 rounded-full border border-blue-600 text-blue-600 max-w-max shadow-sm hover:shadow-lg">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



