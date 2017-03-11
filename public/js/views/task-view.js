App.EditTaskView = Ember.TextField.extend({
    focusOnInsert: function () {
        this.$().focus();
    }.on('didInsertElement')
});

Ember.Handlebars.helper('edit-task', App.EditTaskView);