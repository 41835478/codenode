<template>

    <div   v-loading.body="loading" style="padding-bottom: 50px;" class="container main-container ">

        <div  id="loading1" class="box text-center site-intro rm-link-color">
            技术外站链接
        </div>
        <div  v-if="banners" class="mdl-grid">
            <div v-for="banner in banners" class="mdl-cell mdl-cell--3-col">
                <div class="post-module">
                    <!-- Thumbnail-->
                    <div class="thumbnail">
                        <img style="height: 250px" :src="banner.image_url">
                    </div>

                    <!-- Post Content-->
                    <div class="post-content">

                        <a :href="banner.link" target="_blank">
                            <h3 class="title">{{ banner.title }}</h3>
                            <h2 class="sub_title"></h2>
                            <p class="description" style="display: none; height: 1px; opacity: 1;"></p>
                        </a><div class="post-meta"><a href="http://larabase.com/collection/1/post/33">{{banner.description}}</a></div>

                    </div>
                </div>
            </div>


        </div>
        <div  v-if="topics" class="panel panel-default list-panel home-topic-list">
            <div class="panel-heading">
                <h3 class="panel-title text-center">
                    社区精华帖 &nbsp;
                    <a href="http://phphub5.app/feed" style="color: #E5974E; font-size: 14px;" target="_blank">
                        <i class="fa fa-rss"></i>
                    </a>
                </h3>

            </div>

            <div  class="panel-body " >
                <ul  class="list-group row topic-list">
                    <li  v-for="topic in topics" class="list-group-item media col-md-6" style="margin-top: 0px;">

                        <a class="reply_last_time hidden-xs meta" href="javascript:void (0);">
                            {{ topic.vote_count }} 点赞
                            <span> ⋅ </span>
                            {{ topic.reply_count }}回复
                        </a>

                        <div class="avatar pull-left">
                            <a href="http://phphub5.app/users/13">
                                <img  class="media-object img-thumbnail avatar avatar-middle" :alt="topic.user.name" src="https://avatars0.githubusercontent.com/u/12?v=2&s=100">
                            </a>
                        </div>

                        <div class="infos">

                            <div class="media-heading">

                                <span class="hidden-xs label label-default">专栏</span>

                                <a href="http://phphub5.app/topics/3" title="Voluptatem quae illum quam dolorem ex.">
                                    {{ topic.title }}
                                </a>
                            </div>

                        </div>

                    </li>

                </ul>

            </div>

            <div class="panel-footer text-right">

                <a href="topics?filter=excellent" class="more-excellent-topic-link">
                    查看更多精华帖 <i class="el-icon-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
    export default {
        data () {
            return {
                banners: null,
                topics: null,
                loading:null
            }
        },
        created () {
            // 组件创建完后获取数据，
            // 此时 data 已经被 observed 了
            this.fetchData()
        },
        methods:{
            fetchData(){
               // var tar = document.querySelector('#loading');
                //console.log(tar);
                this.post = this.tiezi=null;
                this.loading=true;
                //this.$loading({ target:'#loading3' });
                var _this = this;
                window.axios.get(baseUrl+"/page").then(function(response){
                    _this.loading=false;
                    _this.banners = response.data.banners.website_top;
                    _this.topics = response.data.topics.data;
                    console.log(response.data.topics.data);
                });
            }
        }
    }
</script>