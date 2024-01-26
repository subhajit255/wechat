<!-- Start of Navigation -->
<div class="navigation">
    <div class="container">
        <div class="inside">
            <div class="nav nav-tab menu">
                @if (auth()->user()->gender == 'male')
                    <button class="btn"><img class="avatar-xl"
                            src="{{ auth()->user()->image ? asset('storage/user_image/' . auth()->user()->image) : asset('assets/dist/img/avatars/default-male.jpg') }}"
                            alt="avatar"></button>
                @else
                    <button class="btn"><img class="avatar-xl"
                            src="{{ auth()->user()->image ? asset('storage/user_image/' . auth()->user()->image) : asset('assets/dist/img/avatars/default-female.jpg') }}"
                            alt="avatar"></button>
                @endif
                <a href="#members" data-toggle="tab" class="my-contacts"><i class="material-icons">account_circle</i></a>
                <a href="#discussions" data-toggle="tab" class="active"><i
                        class="material-icons active">chat_bubble_outline</i></a>
                <a href="#notifications" data-toggle="tab" class="f-grow1 notification"
                    data-notification="{{ auth()->user()->notification }}"><i
                        class="material-icons">notifications_none</i></a>
                <button class="btn mode"><i class="material-icons">brightness_2</i></button>
                <a class="settings" data-toggle="tab" data-user="{{ auth()->user() }}" href="#settings"><i
                        class="material-icons">settings</i></a>
                <button class="btn power" onclick="window.location='{{ route('logout') }}'"><i class="material-icons">power_settings_new</i></button>
            </div>
        </div>
    </div>
</div>
<!-- End of Navigation -->
