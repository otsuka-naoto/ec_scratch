<?php $this->setLayoutVar('title', 'アカウント登録画面') ?>
<h2>アカウント登録画面</h2>
<form action="<?php echo $base_url; ?>/account/register" method="post">
  <div id='app'>
    <router-link to="/top">Id:</router-link><input type="text" name="name" value="<?php echo $user_name; ?>" />
    </br>
    <router-link to="/users">Pass:</router-link><input type="text" name="pass" />
    <router-view></router-view>
  </div>
</form>
<script src="https://unpkg.com/vue@2.5.17"></script>
<script src="https://unpkg.com/vue-router@3.0.1"></script>
<script>
  var router = new VueRouter({
    routes: [{
        path: '/top',
        component: {
          template: '<div>you need to input a id.</div>'
        }
      },
      {
        path: '/users',
        component: {
          template: '<div>you need to input a password.</div>'
        }
      }
    ]
  })
  var app = new Vue({
    router: router
  }).$mount('#app')
</script>