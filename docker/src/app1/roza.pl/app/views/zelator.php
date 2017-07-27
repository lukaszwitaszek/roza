{% extends 'templates/default.php' %}

{% block title %}{{siteTitle}}{% endblock %}

{% block content1 %}
        <p>Witaj {{auth.imie}} {{auth.nazwisko}}.</p>
        <p>Znajdujesz się w Panelu Zelatora KŻR. Koło, ktorym się opiekujesz to {{ kolo.nazwa}}.</p>
{% endblock %}

{% block content2 %}
    
        <p>Wiadomości przeznaczone dla twojego koła:</p>
        <p>
            {% for item in wiadomosc %}
                {{item.naglowek}}, wysłana {{item.updated_at}}<br/>{{item.tresc}}
            {% endfor %}
        </p>
    
{% endblock %}