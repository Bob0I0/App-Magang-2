
<div
    x-data="{
        notifications: [],
        displayDuration: 8000,
        isVisible: false,
        timeout: null,

        addNotification({ variant = 'info', title = null, message = null }) {
            const id = Date.now()
            const notification = { id, variant, title, message }

            // keep max 20
            if (this.notifications.length >= 20) {
                this.notifications.splice(0, this.notifications.length - 19)
            }

            this.notifications.push(notification)
            this.isVisible = true

            // auto remove
            this.timeout && clearTimeout(this.timeout)
            this.timeout = setTimeout(() => {
                this.removeNotification(id)
            }, this.displayDuration)
        },

        removeNotification(id) {
            setTimeout(() => {
                this.notifications = this.notifications.filter(
                    n => n.id !== id
                )

                if (this.notifications.length === 0) {
                    this.isVisible = false
                }
            }, 400)
        },
    }"
    x-on:notify.window="addNotification($event.detail)"

> 
    <div class="group pointer-events-none fixed inset-x-8 top-0 z-99 flex max-w-full flex-col gap-2 bg-transparent px-6 py-6 md:bottom-0 md:left-[unset] md:right-0 md:top-[unset] md:max-w-sm">
        @session('success')
        <div x-cloak x-show="isVisible" 
            class="pointer-events-auto relative rounded-sm border border-green-500 bg-white text-neutral-600 dark:bg-neutral-950 dark:text-neutral-300" role="alert" x-on:pause-auto-dismiss.window="clearTimeout(timeout)" x-on:resume-auto-dismiss.window=" timeout = setTimeout(() => {(isVisible = false), removeNotification(notification.id) }, displayDuration)" x-init="$nextTick(() => { isVisible = true }), (timeout = setTimeout(() => { isVisible = false, removeNotification(notification.id)}, displayDuration))" x-transition:enter="transition duration-300 ease-out" x-transition:enter-end="translate-y-0" x-transition:enter-start="translate-y-8" x-transition:leave="transition duration-300 ease-in" x-transition:leave-end="-translate-x-24 opacity-0 md:translate-x-24" x-transition:leave-start="translate-x-0 opacity-100">
            
            <div class="flex w-full items-center gap-2.5 bg-green-500/10 rounded-sm p-4 transition-all duration-300">
                <!-- Icon -->
                <div class="rounded-full bg-green-500/15 p-0.5 text-green-500" aria-hidden="true">
                    <flux:icon.succesful />
                </div>
                <!-- Title & Message -->
                <div class="flex flex-col gap-2">
                    <h3 class="text-sm font-semibold text-green-500">Berhasil!</h3>
                    <p class="text-pretty text-sm">{{$value}}</p>
                </div>
                <!--Dismiss Button -->
                <button type="button" class="ml-auto" aria-label="dismiss notification" x-on:click="(isVisible = false), removeNotification(notification.id)">
                    <flux:icon.x-mark />
                </button>
            </div>
        </div>   
        @endsession
        
        <!-- Error notification -->
        {{-- <div x-cloak x-show="isVisible" 
            class="pointer-events-auto relative rounded-sm border border-red-500 bg-white text-neutral-600 dark:bg-neutral-950 dark:text-neutral-300" role="alert" x-on:pause-auto-dismiss.window="clearTimeout(timeout)" x-on:resume-auto-dismiss.window=" timeout = setTimeout(() => {(isVisible = false), removeNotification(notification.id) }, displayDuration)" x-init="$nextTick(() => { isVisible = true }), (timeout = setTimeout(() => { isVisible = false, removeNotification(notification.id)}, displayDuration))" x-transition:enter="transition duration-300 ease-out" x-transition:enter-end="translate-y-0" x-transition:enter-start="translate-y-8" x-transition:leave="transition duration-300 ease-in" x-transition:leave-end="-translate-x-24 opacity-0 md:translate-x-24" x-transition:leave-start="translate-x-0 opacity-100">
            <div class="flex w-full items-center gap-2.5 bg-red-500/10 rounded-sm p-4 transition-all duration-300">

                <!-- Icon -->
                <div class="rounded-full bg-red-500/15 p-0.5 text-red-500" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                    </svg>
                </div>

                <!-- Title & Message -->
                <div class="flex flex-col gap-2">
                    <h3 class="text-sm font-semibold text-red-500">Error!</h3>
                    <p class="text-pretty text-sm">Ada Error</p>
                </div>

                <!--Dismiss Button -->
                <button type="button" class="ml-auto" aria-label="dismiss notification" x-on:click="(isVisible = false), removeNotification(notification.id)">
                    <flux:icon.x-mark />
                </button>
            </div>
        </div> --}}
    </div>
</div>