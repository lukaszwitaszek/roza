{% if nav %}
    <div id="nav">
    {% if navHorizontal %}
        <p>
        {% for item in nav %}
            <a href="{{ item.anchor }}">{{ item.text }}</a></br>
        {% endfor%}
        {% if auth.zelat %}
            <a href="{{ urlFor('zelator') }}">zelator</a></br>
        {% endif %}
        {% if auth.admin %}
            <a href="{{ urlFor('admin') }}">administrator</a></br>
        {% endif %}
        {% if auth %}
            <a href="{{ urlFor('logout') }}">wyloguj</a></br>
        {% endif %}
        </p>
    {% else %}
        <p>
        {% for item in nav %}
            <a href="{{ item.anchor }}">| {{ item.text }} |</a>
        {% endfor%}
        {% if auth.zelat %}
            <a href="{{ urlFor('zelator') }}">| zelator |</a>
        {% endif %}
        {% if auth.admin %}
            <a href="{{ urlFor('admin') }}">| administrator |</a>
        {% endif %}
        {% if auth %}
            <a href="{{ urlFor('logout') }}">| wyloguj |</a>
        {% endif %}
        </p>
    {% endif %}
    </div><hr>
{% endif %}