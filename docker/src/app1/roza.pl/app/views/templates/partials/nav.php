{% if nav %}
    <div id="nav">
    {% if navHorizontal %}
        <p>
        {% for item in nav %}
            <a href="{{ item.anchor }}">{{ item.text }}</a></br>
        {% endfor%}
        
        {% if auth %}
            <a href="{{ urlFor('logout') }}">Wyloguj</a></br>
        {% endif %}
        </p>
    {% else %}
        <p>
        {% for item in nav %}
            <a href="{{ item.anchor }}">| {{ item.text }} |</a>
        {% endfor%}
        {% if auth %}
            <a href="{{ urlFor('logout') }}">Wyloguj</a>
        {% endif %}
        </p>
    {% endif %}
    </div><hr>
{% endif %}