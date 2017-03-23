<template>
<div class="col-md-9 topics-index main-col">
    <div class="panel panel-default">

        <div class="panel-heading">

            <ul class="list-inline topic-filter">
                <li class="popover-with-html" data-content="最后回复排序" data-original-title="" title=""><a href="http://phphub5.app/topics?filter=default">专栏</a></li>
            </ul>

            <div class="clearfix"></div>
        </div>


        <div v-loading.body="loading"  class="jscroll"><div class="jscroll-inner">
            <div class="panel-body remove-padding-horizontal">
                <ul class="list-group row topic-list">

                    <li v-for="topic in topics" class="list-group-item ">

                        <a class="reply_count_area hidden-xs pull-right" href="http://phphub5.app/topics/1">
                            <div class="count_set">
                     <span class="count_of_votes" title="投票数">
                       {{ topic.vote_count }}
                    </span>

                                <span class="count_seperator">/</span>

                                <span class="count_of_replies" title="回复数">
                       0
                     </span>

                                <span class="count_seperator">/</span>

                                <span class="count_of_visits" title="查看数">
                       1
                     </span>
                                <span class="count_seperator">|</span>

                                <abbr title="" class="timeago popover-with-html" data-content="2017-03-07 23:43:24" data-original-title="2017-03-07 23:43:24">2天前</abbr>
                            </div>
                        </a>

                        <div class="avatar pull-left">
                            <a href="http://phphub5.app/users/19" title="phyllis79">
                                <img class="media-object img-thumbnail avatar avatar-middle" alt="phyllis79" :src="topic.user.data.avatar">
                            </a>
                        </div>


                        <div class="infos">

                            <div class="media-heading">

                                <span class="hidden-xs label label-success">{{ topic.category.data.name }}</span>

                                <a href="http://phphub5.app/topics/1" title="Ipsum impedit aut porro qui vel et eum qui.">
                                    {{ topic.body }}
                                </a>

                            </div>

                        </div>

                    </li>


                </ul>

            </div>

            <div class="panel-footer text-right remove-padding-horizontal pager-footer" style="display: none;">
                <!-- Pager -->
                <ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="http://phphub5.app/topics?filter=excellent&amp;page=2">2</a></li><li><a href="http://phphub5.app/topics?filter=excellent&amp;page=3">3</a></li> <li><a href="http://phphub5.app/topics?filter=excellent&amp;page=2" rel="next">»</a></li></ul>
            </div>
        </div></div>


    </div>

    <!-- Nodes Listing -->

</div>
</template>
<script>
    export default{
            data(){
                return {
                    topics : null,
                    loading :null
                }
            },
        created(){
            this.fetchData();
        },
        methods:{
            fetchData(){
                var _this = this;
                this.loading = true;
                window.axios.get(baseUrl+"/api/topic?include=category,last_reply_user,user,replies&%20filters=wiki&per_page=20&page=1").then(function (response) {
                    console.log(response);
                    _this.loading = false;
                    _this.topics = response.data.data;
                })
            }
        }
    }
</script>