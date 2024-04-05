<x-side-nav-link href="{{ route('workout-plans.admin-list') }}" :active="request()->routeIs('workout-plans.admin-list')">
    Workout plans
</x-side-nav-link>
<x-side-nav-link href="{{ route('exercises.admin-list') }}" :active="request()->routeIs('exercises.admin-list')">
    Exercises
</x-side-nav-link>
<x-side-nav-link href="{{ route('health.admin-list') }}" :active="request()->routeIs('health.admin-list')">
    Foods
</x-side-nav-link>
<x-side-nav-link href="{{ route('profile.admin-list') }}" :active="request()->routeIs('profile.admin-list')">
    Users
</x-side-nav-link>
<x-side-nav-link href="{{ route('blog.admin-list') }}" :active="request()->routeIs('blog.admin-list')">
    Posts
</x-side-nav-link>
