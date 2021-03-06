{% extends 'templates/default.php' %}


{% block title %}LogIN{% endblock %}


{% block content %}
LogIN User</br>
<form action="{{ urlFor('login.post') }}" method="post" autocomplete="off">
    <div>
        <label for="identifier">Username/email</label>
        <input type="text" name="identifier" id="identifier" {% if request.post('identifier') %}    value="{{ request.post('identifier') }}" {% endif %}>
        {% if errors.first('identifier') %} {{ errors.first('identifier') }}{% endif %}
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        {% if errors.first('password') %} {{ errors.first('password') }}{% endif %}
    </div>
    <div>
        <input type="submit" value="LogIN">
    </div>
    
</form>
{% endblock %}