<template>
  <div>
    <nav style="margin-top: -60px;">
      <div class="progress" v-if="loading">
        <div class="indeterminate"></div>
      </div>
      <div class="nav-wrapper white-text text-darken-2">
        <ul id="nav-mobile" class="right hide-on-med-and-down white-text text-darken-2">
          <li><a href="https://www.aphixsoftware.com/">Aphix</a></li>
          <li><a href="https://github.com/flashimxdl">Rangel GitHub</a></li>
        </ul>
      </div>
    </nav>

    <div class="row">
      <div class="input-field col s12">
        <i class="material-icons prefix">search</i>
        <input type="text" placeholder="Search in Youtube.." v-model="search"/>
        <div class="row">
          <a class="red waves-effect waves-light btn-large white-text text-darken-2" @click.prevent="find"><i class="material-icons right">music_video</i>Ok</a>
        </div>
      </div>
    </div>

    <div class="row" v-if="data.length">
      <div class="card-panel z-depth-5">
        <i class="material-icons left">library_music</i><h6 class="left-align text-darken-2">Videos</h6>
        <div class="col s3" v-for="item in data">
            <div class="card"  style="padding: 5%;">
              <div class="card-image"> 
                  <div v-html="item.player"></div>
                  <!--<span class="card-title">{{item.title}}</span> -->
              </div>
              <div class="card-content" style="min-height: 180px;">
                  <p>{{item.description | truncate(140, '...')}}</p>
              </div>
              <div class="card-action">
                  <a href="#">See on Youtube</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'YouTubeSearch',
  data () {
    return {
      search: '',
      data: {},
      loading: false,
      baseUrl: 'http://localhost:8000/api/'
    }
  },
  methods: {
    find() {
    this.loading = true;
    this.$http.post(this.baseUrl, {search: this.search}).then(response => {
      this.loading = false;
      this.data = response.body;
    },response => {
      this.loading = false;
    });
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.card {
  overflow: hidden;
}
</style>
