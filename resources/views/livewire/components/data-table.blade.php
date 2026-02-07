<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                @foreach($columns as $column)
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        {{ $column['label'] }}
                    </th>
                @endforeach
                @if($actions)
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                        Acciones
                    </th>
                @endif
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($data as $row)
                <tr class="hover:bg-gray-50">
                    @foreach($columns as $column)
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            @if($column['field'] === 'color')
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded" style="background-color: {{ $row[$column['field']] }}"></div>
                                    <span>{{ $row[$column['field']] }}</span>
                                </div>
                            @elseif($column['field'] === 'estado')
                                <span class="px-2 py-1 rounded text-xs {{ $row[$column['field']] == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $row[$column['field']] == 1 ? 'Activo' : 'Inactivo' }}
                                </span>
                            @else
                                {{ $row[$column['field']] ?? '-' }}
                            @endif
                        </td>
                    @endforeach
                    @if($actions)
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <button wire:click="edit({{ $row['id'] }})" 
                                    class="text-blue-600 hover:text-blue-900 mr-3">
                                Editar
                            </button>
                            <button wire:click="delete({{ $row['id'] }})" 
                                    class="text-red-600 hover:text-red-900">
                                Eliminar
                            </button>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) + ($actions ? 1 : 0) }}" 
                        class="px-6 py-4 text-center text-gray-500">
                        No hay registros para mostrar
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>