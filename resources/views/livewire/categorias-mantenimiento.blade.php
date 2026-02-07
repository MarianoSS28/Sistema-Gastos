<div class="p-6">
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Mantenimiento de Categorías</h2>
        <button wire:click="create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            Nueva Categoría
        </button>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <livewire:components.search-bar placeholder="Buscar categoría..." />

    <livewire:components.data-table 
    :columns="$columns" 
    :data="$data" 
    :key="'table-' . $perPage . '-' . $search . '-' . $this->getPage()" />

    <div class="mt-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-700">Mostrar:</label>
            <select wire:model.live="perPage" class="border border-gray-300 rounded px-2 py-1 text-sm">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <span class="text-sm text-gray-700">
                registros (Total: {{ $totalRegistros }})
            </span>
        </div>
        
        {{ $paginator->links() }}
    </div>

    @if($showModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        {{ $isEdit ? 'Editar Categoría' : 'Nueva Categoría' }}
                    </h3>
                    
                    <form wire:submit.prevent="save">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" wire:model="nombre" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                            <input type="color" wire:model="color" 
                                class="w-full h-10 border border-gray-300 rounded-lg cursor-pointer">
                            @error('color') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                            <select wire:model="estado" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('estado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Observación</label>
                            <textarea wire:model="observacion" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            @error('observacion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="closeModal" 
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                                Cancelar
                            </button>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if($showDeleteModal)
        <livewire:components.confirm-modal 
            title="¿Confirmar eliminación?"
            message="Esta acción no se puede deshacer. ¿Está seguro de que desea eliminar esta categoría?"
            confirm-text="Eliminar"
            cancel-text="Cancelar"
            confirm-event="confirm-delete"
            :key="'confirm-'.now()" />
    @endif
</div>