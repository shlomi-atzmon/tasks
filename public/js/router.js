App.Router.map(function () {
  this.resource('tasks', {path: '/'});
});

App.TasksRoute = Ember.Route.extend({
  model: function () {
    return this.store.find('task');
  }
});       