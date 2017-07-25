{% if auth %}
   <p> Hello, {{ auth.getFullNameOrUsername() }} </p>
   <a>LogOUT</a>
{% endif %}
<ul>
    <li><a href="{{ urlFor('home') }}">HOME</a></li>
    {% if auth %}
    
    {% else %}
        <li><a href="{{ urlFor('register') }}">REG</a></li>
        <li><a href="{{ urlFor('login') }}">LogIN</a></li>
    {% endif %}
</ul>
