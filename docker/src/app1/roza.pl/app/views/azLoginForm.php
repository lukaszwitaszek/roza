{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
    Witaj {{auth.imie}} {{auth.nazwisko}}.
    Uzyskaj dostęp do informacji dla administratora/zelatora.</br>
    <form action="{{ action }}" method="post" autocomplete="off">
        <div>
            <label for="password">Podaj hasło</label>
            <input type="password" name="password" id="password">
            {% if errors.first('password') %} {{ errors.first('password') }}{% endif %}
        </div>
        <div>
            <input type="submit" value="Wejdź">
        </div>
    </form>
{% endblock%}
{% block content2 %}
{% endblock%}