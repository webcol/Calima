(function() {
  'use strict';

  angular.module('mobile-angular-ui.migrate.disabled', []).run([
    '$document', function($document) {
      return angular.element($document).on("click tap", function(e) {
        var target;
        target = angular.element(e.target);
        if (target.hasClass("disabled")) {
          e.preventDefault();
          e.stopPropagation();
          target = null;
          return false;
        } else {
          target = null;
          return true;
        }
      });
    }
  ]);

}());