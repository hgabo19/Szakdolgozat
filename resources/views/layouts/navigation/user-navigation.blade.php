<x-side-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
    Dashboard
</x-side-nav-link>
<x-side-nav-link href="{{ route('blog.index') }}" :active="request()->routeIs('blog.*')">
    Blog
</x-side-nav-link>
<x-side-nav-link href="{{ route('health.index') }}" :active="request()->routeIs('health.index')">
    Health
</x-side-nav-link>
<x-side-nav-link href="{{ route('workout-plans.index') }}" :active="request()->routeIs('workout-plans.index')">
    Workout plans
</x-side-nav-link>
<x-side-nav-link href="{{ route('exercises.index') }}" :active="request()->routeIs('exercises.index')">
    Exercises
</x-side-nav-link>
<x-side-nav-link href="#">
    About
</x-side-nav-link>
