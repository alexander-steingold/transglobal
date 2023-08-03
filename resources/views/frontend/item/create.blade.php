<x-base-layout title="Submit Property" company="true">
    <x-app-partials.container>

        <div class=" mb-4">
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                Submit Property
            </h2>
        </div>

        <x-app-partials.card>
            <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                @method('POST') @csrf
                <div class="mb-4">
                    <h2 class="text-lg text-success">Basic Information</h2>
                    <x-app-partials.divider/>
                </div>
                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-4">
                    <div>
                        <x-forms.input-label for="title" value="Property Title"/>
                        <x-forms.text-input name="title" placeholder="" value="{{ old('title') }}"/>
                        <x-forms.input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="target" value="Status"/>
                        <x-forms.select name="target">
                            @foreach($targets as $target)
                                <option
                                    value="{{ $target }}" @selected(request('target') === $target)>{{ Str::ucfirst($target)  }}</option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.input-error :messages="$errors->get('target')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="type" value="Type"/>
                        <x-forms.select name="type">
                            @foreach($types as $type)
                                <option
                                    value="{{ $type }}" @selected(request('type') === $type)>{{ Str::ucfirst($type)  }}</option>
                            @endforeach
                        </x-forms.select>
                        <x-forms.input-error :messages="$errors->get('type')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="area" value="Area SqMt"/>
                        <x-forms.text-input name="area" placeholder="" type="number" value="{{ old('area') }}"/>
                        <x-forms.input-error :messages="$errors->get('area')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="price" value="Price $"/>
                        <x-forms.text-input name="price" placeholder="" type="number" value="{{ old('price') }}"/>
                        <x-forms.input-error :messages="$errors->get('price')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="available_from" value="Available From"/>
                        <input
                            x-init="$el._x_flatpickr = flatpickr($el,{enableTime: false, altInput: true, dateFormat: 'Y-m-d',minDate: 'today', altFormat: 'F j, Y'})"
                            class="form-input  w-full rounded-lg border mt-1 border-slate-300 bg-transparent px-3 py-2  placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                            placeholder=""
                            type="text"
                            name="available_from"
                            value="{{ old('available_from') }}"
                        />
                        <x-forms.input-error :messages="$errors->get('available_from')" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <h2 class="text-lg text-success">Detailed Information</h2>
                    <x-app-partials.divider/>
                </div>
                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-4">
                    <div class="lg:col-span-3 sm:col-span-2">
                        <x-forms.input-label for="description" value="Details"/>
                        <x-forms.textarea rows="2" placeholder="" name="description">
                            {{ old('description')  }}
                        </x-forms.textarea>
                        <x-forms.input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="year_built" value="Building Age"/>
                        <x-forms.select name="year_built">
                            @for($i = 5; $i <= 50; $i+=5)
                                <option value="{{ $i }}" @selected(old('year_built') == $i)>0-{{ $i }} years</option>
                            @endfor
                        </x-forms.select>
                        <x-forms.input-error :messages="$errors->get('year_built')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="bedrooms" value="Bedrooms"/>
                        <x-forms.select name="bedrooms">
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" @selected(old('bedrooms') == $i)>{{ $i }}</option>
                            @endfor
                        </x-forms.select>
                        <x-forms.input-error :messages="$errors->get('bedrooms')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="bathrooms" value="Bathrooms"/>
                        <x-forms.select name="bathrooms">
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" @selected(old('bathrooms') == $i)>{{ $i }}</option>
                            @endfor
                        </x-forms.select>
                        <x-forms.input-error :messages="$errors->get('bathrooms')" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <h2 class="text-lg text-success">Location</h2>
                    <x-app-partials.divider/>
                </div>
                <div class="grid xl:grid-cols-2 sm:grid-cols-2 gap-4">
                    <div>
                        <x-forms.input-label for="city" value="City"/>
                        <x-forms.text-input name="city" placeholder="" value="{{ old('city') }}"/>
                        <x-forms.input-error :messages="$errors->get('city')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="address" value="Address"/>
                        <x-forms.text-input name="address" placeholder="" value="{{ old('address') }}"/>
                        <x-forms.input-error :messages="$errors->get('address')" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-4 mb-4">
                    <h2 class="text-lg text-success">Features</h2>
                    <x-app-partials.divider/>
                </div>
                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-4">
                    @foreach($features as $feature)
                        <div>
                            <x-forms.checkbox name="{{ $feature }}" value="{{ old($feature) }}">
                                {{ Str::headline(Str::replace('_', ' ',$feature)) }}
                            </x-forms.checkbox>
                            <x-forms.input-error :messages="$errors->get($feature)" class="mt-2"/>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4 mb-4">
                    <h2 class="text-lg text-success">Contact Details</h2>
                    <x-app-partials.divider/>
                </div>
                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-4">
                    <div>
                        <x-forms.input-label for="contact_name" value="Contact Name"/>
                        <x-forms.text-input name="contact_name" placeholder="" value="{{ old('contact_name') }}"/>
                        <x-forms.input-error :messages="$errors->get('contact_name')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="contact_email" value="Contact Email"/>
                        <x-forms.text-input name="contact_email" placeholder="" value="{{ old('contact_name') }}"/>
                        <x-forms.input-error :messages="$errors->get('contact_email')" class="mt-2"/>
                    </div>
                    <div>
                        <x-forms.input-label for="contact_phone" value="Contact Phone"/>
                        <x-forms.text-input name="contact_phone" placeholder="" value="{{ old('contact_name') }}"/>
                        <x-forms.input-error :messages="$errors->get('contact_phone')" class="mt-2"/>
                    </div>

                </div>

                <div class="mt-4 mb-4">
                    <h2 class="text-lg text-success">Image Gallery</h2>
                    <x-app-partials.divider/>
                </div>
                <div>
                    <div class="filepond fp-grid fp-bordered [--fp-grid:4]">
                        <input type="file" name="image" class="filepond"
                               x-init="$el._x_filepond = FilePond.create($el);
                                                         FilePond.setOptions({
                                                            server: {
                                                                process: '/tmp-upload',
                                                                revert: '/tmp-delete',
                                                                headers: {
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                }
                                                            },
                                                        });"
                               multiple/>
                        <x-forms.input-error :messages="$errors->get('image')" class="mt-2"/>
                    </div>
                </div>
                <div class="mb-2">
                    <x-app-partials.divider class="mt-4"/>
                    <x-forms.button-success class="mt-2">
                        Save Property
                    </x-forms.button-success>
                </div>
            </form>
        </x-app-partials.card>
    </x-app-partials.container>
</x-base-layout>
