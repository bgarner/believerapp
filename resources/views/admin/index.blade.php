this is the blade view for the admin

<form id="logout-form" action="/logout" method="POST">
    {{ csrf_field() }}
    <button type="submit">logout</button>
</form>

