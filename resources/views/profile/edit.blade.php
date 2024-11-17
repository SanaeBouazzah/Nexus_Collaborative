<x-app-layout>
    <div class="container">
      <div class="settings-profile">
        <div class="flex-start max-mobile">
            <div class="width-70">
                <div class="Edit-information2">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="Edit-information3">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
            <div class="Edit-informtion">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-image-form')
                </div>
            </div>
        </div>

        <div class="AddImageGallery">
            <div class="max-w-xl">
                @include('profile.partials.add-image-galerie-form')
            </div>
        </div>

        <div class="Edit-information4">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
