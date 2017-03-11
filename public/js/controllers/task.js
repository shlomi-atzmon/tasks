App.TaskController = Ember.ObjectController.extend({
  isEditTask: false,
  tempTesk: '',
  
  actions: {
    cancelEdit: function () {
      this.set('title', this.get('title'));
      this.set('isEditTask', false);
    },
    
    editTask: function () {
      var title = this.get('title');
      this.set('tempTesk', title);
      this.set('isEditTask', true);
    },
    
    sendEditTask: function () {
      var task = this.get('model');
      if (this.get('tempTesk') === '') {
        this.send('deleteTask', task.get('id'));
        return false;
      }
      this.set('title', this.get('tempTesk'));
      this.set('isEditTask', false);
      task.save();
    },
    
    deleteTask: function (id) {
      var task = this.get('model');
      task.deleteRecord();
      task.save();
      this.send('updateIndex', id);
    },
    
    taskCompleted: function (id) {
      var completed = this.get('completed');
      completed = (completed) ? false : true;
      this.store.find('task', id).then(function (task) {
        task.set('completed', completed);
        task.save();
      });
    }
  },
  
  taskIndex: Ember.computed('model', function () {
    var index = this.get('parentController').get('counter') + 1;
    this.get('parentController').set('counter', index);
    return index;
  }),
  
  updateIndex: function (deletedId) {
    var index = 0;
    this.get('parentController').map(function (task) {
      if (task.get('id') !== deletedId) {
        index++;
        return task.set('taskIndex', index);
      }
    });
    var updateCounter = this.get('parentController').get('counter') - 1;
    this.get('parentController').set('counter', updateCounter);
  }
});


