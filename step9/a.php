<ul>
  <li ng-repeat="x in json">
  <h3><a href="#/second/{{ x.menu_id }}">{{ x.name }}</a></h3>
  <p>{{ x.content }}... <a href="#/second/{{ x.menu_id }}">More</a></p>
</ul>
