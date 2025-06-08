<div
    x-data="toastHandler()"
    x-init="init()"
    class="fixed top-5 right-5 w-96 z-50"
>
    <template x-for="(toast, index) in toasts" :key="index">
        <div
            class="relative mb-4 flex items-start justify-between rounded-lg border p-4 shadow-lg bg-white text-black"
        >
            <div class="flex items-center space-x-2">
                <template x-if="toast.type === 'success'">
                    <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </template>

                <template x-if="toast.type === 'error'">
                    <svg class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </template>

                <template x-if="toast.type === 'warning'">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 3L2 21h20L12 3z" />
                    </svg>
                </template>

                <template x-if="toast.type === 'info'">
                    <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                    </svg>
                </template>
                <span x-text="toast.message"></span>
            </div>

            <button @click="remove(index)" class="ml-4">✖</button>

            <div
                class="absolute bottom-0 left-0 h-1 rounded-b-lg"
                :class="{
                    'bg-green-500': toast.type === 'success',
                    'bg-red-500': toast.type === 'error',
                    'bg-yellow-500': toast.type === 'warning',
                    'bg-blue-500': toast.type === 'info'
                }"
                style="animation: shrink 5s linear forwards "

            ></div>
        </div>
    </template>
</div>

<style>
    @keyframes shrink {
        from { width: 0%; }
        to { width: 100%; }
    }
</style>
<script>
    function toastHandler() {
        return {
            listenerAdded : false,
            toasts: [],
            init() {
                if (!this.listenerAdded) {
                    document.addEventListener('toast', event => {
                        this.add(event.detail[0]);
                        console.log(1);
                    });
                    this.listenerAdded = true;
                }
            },
            add({ message, type }) {
                this.toasts.push({ message, type });
                setTimeout(() => {
                    this.toasts.shift();
                }, 5000);
            },
            remove(index) {
                this.toasts.splice(index, 1);
            }
        }
    }
</script>
