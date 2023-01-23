@props([
    'route',
    'parameter',
    'translatable',
    'attributes'
])

@php
    $id = "searchable_select_" . now()->timestamp;
@endphp

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('{{ $id }}', () => ({
                opened: false,
                isLoading: false,
                items: [],
                selected: {
                    key: @if($attributes->has('name') && old($attributes->get('name'))) {{ old($attributes->get('name')) }} @else null @endif
                },
                async init() {
                    const {route, parameter} = this.$el.dataset
                    this.route = route
                    this.parameter = parameter

                    this.items = await this.getItems()
                    if (this.selected.key) {
                        const index = this.items.findIndex(i => i.key = this.selected.key)
                        if (index !== -1) {
                            this.selected = this.items[index]
                        } else {
                            this.selected = {key: null}
                        }
                    }
                },
                async getItems(query = null) {
                    this.isLoading = true
                    let url = `${this.route}?method=paginate`
                    if (query !== null && query.length > 0) {
                        url = `${url}&search=${this.parameter}@if($translatable)->{{ App::getLocale() }}@endif:${query}`
                    }
                    return fetch(url)
                        .then(response => response.json())
                        .then(({data}) => data.map(item => ({
                            title: item[this.parameter],
                            key: item.hasOwnProperty('uuid')
                                ? item.uuid
                                : (item.hasOwnProperty('id') ? item.id : item[this.parameter])
                        })))
                        .finally(() => {
                            this.isLoading = false
                        })
                },
                handleInputChange(event) {
                    clearTimeout(this.queryTimeout)
                    this.queryTimeout = setTimeout(async () => {
                        this.items = await this.getItems(event.target.value)
                    }, 800)
                }
            }))
        })
    </script>
@endpush

<div x-data="{{ $id }}" data-parameter="{{ $parameter }}" data-route="{{ $route }}"
     class="flex flex-col items-center relative">
    <input type="hidden" x-model="selected.key" {{ $attributes }}>
    <div class="w-full">
        <div
            x-on:click.away="opened = false"
            class="my-2 p-1 bg-white flex border border-gray-200 rounded transition-all delay-150 ease-in-out"
            :class="{'animate-pulse border-indigo-500': isLoading}"
        >
            <input
                x-bind:value="selected.title"
                x-on:input="handleInputChange"
                x-on:focus="opened = true"
                :disabled="isLoading"
                class="p-1 px-2 appearance-none outline-none w-full text-gray-800">
            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                <button x-on:click.prevent="opened = !opened" type="button"
                        class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline x-show="opened" points="18 15 12 9 6 15"></polyline>
                        <polyline x-show="!opened" points="18 15 12 20 6 15"></polyline>
                    </svg>

                </button>
            </div>
        </div>
    </div>
    <div
        x-show="opened && !isLoading"
        x-transition
        class="absolute shadow bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto mt-14">
        <div class="flex flex-col w-full overflow-y-scroll max-h-48">
            <template x-for="item in items">
                <div
                    x-on:click="selected = item"
                    class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-indigo-100 cursor-pointer">
                    {{--                            <div class="w-6 flex flex-col items-center">--}}
                    {{--                                <div--}}
                    {{--                                    class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">--}}
                    {{--                                    <img class="rounded-full" alt="A" x-bind:src="option.picture.thumbnail"></div>--}}
                    {{--                            </div>--}}
                    <div class="w-full items-center flex">
                        <div class="mx-2 -mt-1">
                            <span x-text="item.title"></span>
                            {{--                            <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500">--}}
                            {{--                                secondary--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </template>
            <div
                x-show="items.length === 0"
                class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-indigo-100 cursor-pointer">
                <div class="w-full items-center flex">
                    <div class="mx-2 -mt-1">
                        <span>@lang('pagination.no-items')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
