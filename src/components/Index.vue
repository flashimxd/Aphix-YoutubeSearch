<template>
    <div>
        <nav>
          <div class="nav-wrapper">
            <a href="#" class="brand-logo">Logo</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="sass.html">Sass</a></li>
              <li><a href="badges.html">Components</a></li>
              <li><a href="collapsible.html">JavaScript</a></li>
            </ul>
          </div>
        </nav>

      <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">search</i>
                <input type="text" placeholder="Search in Youtube.." v-model="search"/>
                <!--<a class="waves-effect waves-light btn btn-large" @click.prevent="find">OK</a> -->

                <div class="row">
                  <a class="red waves-effect waves-light btn-large" @click.prevent="find"><i class="material-icons right">music_video</i>Search...</a>
                </div>
            </div>
        </div>
          <div class="row" v-if="data.length">
            <div class="col s3" v-for="item in data">
                <div class="card"  style="padding: 5%;">
                  <div class="card-image"> 
                     <div v-html="item.player"></div>
                      <span class="card-title">{{item.title}}</span>
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
</template>

<script>

export default {
  name: 'YouTubeSearch',
  data () {
    return {
      search: '',
      data: {}
    }
  },
  methods: {
    find() {
      // console.log('clicked find')
    console.log(this.search)
      // debugger

    this.$http.post('http://localhost:8000/api/', {search: this.search}).then(response => {

      this.data = response.body;
      console.log(this.data)
        // get body data
        // this.someData = response.body;

        },response => {
          // error callback
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
</style>
