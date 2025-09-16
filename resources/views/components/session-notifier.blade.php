@if (session('success'))
    <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-success"
            id="layout-navbar"
          >
        {{ session('success') }}   
</nav>
@endif
{{-- @if (session('failed'))
    <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-danger"
            id="layout-navbar"
          >
        {{ session('failed') }}   
</nav>
@endif
@if(session('status'))
{{ session('status') }}
@endif --}}