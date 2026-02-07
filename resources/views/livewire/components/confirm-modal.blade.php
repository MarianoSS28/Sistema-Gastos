<div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-2">{{ $title }}</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">{{ $message }}</p>
            </div>
            <div class="flex justify-center gap-3 px-4 py-3">
                <button wire:click="cancel" 
                        class="px-6 py-2 bg-gray-300 text-gray-800 font-medium rounded-md hover:bg-gray-400">
                    {{ $cancelText }}
                </button>
                <button wire:click="confirm" 
                        class="px-6 py-2 bg-red-300 text-red-800 font-medium rounded-md hover:bg-gray-400">
                    {{ $confirmText }}
                </button>
            </div>
        </div>
    </div>
</div>