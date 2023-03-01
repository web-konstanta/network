<nav class="sidebar">
    <ul class="sidebar__menu">
        <li style="font-size: 30px" class="logo">
            <a href="{{ route('posts.index') }}" class="user__sidebar">Social network</a>
        </li>
        <li>
            <a href="{{ route('posts.index') }}" class="user__sidebar">Home</a>
        </li>
        <li>
            <a href="{{ route('cabinet.search') }}" class="user__sidebar">Search users</a>
        </li>
        <li>
            <a href="{{ route('posts.create') }}" class="user__sidebar">Create post</a>
        </li>
        <li>
            <a href="{{ route('cabinet.index') }}" class="user__sidebar">Profile</a>
        </li>
    </ul>
</nav>
