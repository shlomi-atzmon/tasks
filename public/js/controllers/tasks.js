App.TasksController = Ember.ArrayController.extend({
  itemController: 'task',
  addTask: false,
  counter: 0,
  
  actions: {
    addTask: function () {
      this.set('addTask', true);
    },
    
    createTask: function () {
      var taskValue, task;
      taskValue = this.get('taskValue').trim();

      if (!taskValue) {
        return;
      }

      task = this.store.createRecord('task', {
        title: taskValue,
        completed: false
      });

      task.save();
      this.set('taskValue', '');
      this.set('addTask', false);
    }
  },
  
  unfinished: function () {
    return this.filterBy('completed', false).get('length');
  }.property('@each.completed'),
  taskCompleted: function () {
    return this.filterBy('completed', true).get('length');
  }.property('@each.completed'),
  total: function () {
    return this.get('length');
  }.property('@each.completed')
  
});

