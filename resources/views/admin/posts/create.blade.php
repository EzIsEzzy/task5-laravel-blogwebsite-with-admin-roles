<x-admin.admin-layout pageName="Create Post" brandName="Blog Website" icon="{{asset('admin/assets/img/favicon/favicon.ico')}}">
    <x-slot:content>
        <x-session-notifier />
    <x-admin.cards.form-card formTitle="Create a Post" formDesc="Post Creation Page" buttonTitle="Create Post" action="{{ route('posts.store') }}" method="POST"/> 
    </x-slot:content>
    <x-slot:footer>

    </x-slot:footer>
</x-admin.admin-layout>
