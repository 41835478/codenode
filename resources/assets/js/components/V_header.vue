<template>

                <el-row >
                    <el-col :span="10" >
                        <el-menu style="width:500px;" theme="light" :default-active="activeIndex" class="el-menu-demo" mode="horizontal" >
                            <el-menu-item index="0"><router-link to="/index">首页</router-link></el-menu-item>
                            <el-menu-item index="1"><router-link to="/shequ">社区</router-link></el-menu-item>
                            <el-menu-item index="2"><router-link to="/zhuanlan">专栏</router-link></el-menu-item>
                            <el-menu-item index="3"><router-link to="/wenda">问答</router-link></el-menu-item>
                        </el-menu>
                    </el-col>
                    <el-col :span="4"  style="margin-top: 10px;">
                        <el-input
                                placeholder="搜索"
                                icon="search"
                                v-model="input2"
                                :on-icon-click="handleIconClick">
                        </el-input>
                    </el-col>
                    <el-col :span="2" :offset="2" style="line-height:60px;">

                        <el-button v-if="!username" type="primary" @click="dialogVisible = true">登陆</el-button>
                        <ul v-if="username" class="nav navbar-nav github-login">


                            <li style="width:600px">
                                <a href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dLabel">
                                    <img class="avatar-topnav" alt="Summer" src="https://dn-phphub.qbox.me/uploads/avatars/5845_1473838759.png?imageView2/1/w/100/h/100">
                                    {{username}}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">



                                    <li>
                                        <a style="cursor: pointer"  v-on:click="logout" data-lang-loginout="你确定要退出吗?">
                                            <i class="fa fa-sign-out text-md"></i> 退出
                                        </a>
                                    </li>
                                </ul>


                            </li>

                        </ul>
                    </el-col>
                    <el-dialog  title="请登陆" :modal=true :lock-scroll=false top="5%" v-model="dialogVisible" size="tiny">
                        <div class="panel-body">

                            <form method="POST"  accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="">


                                <div class="form-group ">
                                    <label class="control-label" for="email">邮箱</label>
                                    <input class="form-control"  name="email" type="text" value="" placeholder="请填写 Email">

                                </div>

                                <div class="form-group ">
                                    <label class="control-label" for="password">密 码</label>
                                    <input class="form-control" name="password" type="password" value="" placeholder="请填写密码">

                                </div>

                                <button  v-on:click="login()" type="button" class="btn btn-lg btn-success btn-block" >
                                    <i class="fa fa-btn fa-sign-in"></i> 登录
                                </button>

                                <hr>

                                <fieldset class="form-group">
                                    <div class="alert alert-info">
                                        使用以下方法注册或者登录。
                                    </div>
                                    <a class="btn btn-lg btn-default btn-block" id="login-required-submit" href="/auth/github"><i class="fa fa-github-alt"></i> GitHub 登录</a>
                                    <a class="btn btn-lg btn-default btn-block" href="http://phphub5.app/auth/oauth?driver=wechat"><i class="fa fa-weixin"></i> 使用微信登录</a>
                                </fieldset>
                            </form>

                        </div>
                    </el-dialog>
                </el-row>

</template>

<script>

    export default {
        data() {
            return {
                activeIndex:"0",
                dialogVisible: false,
                username : localStorage.getItem('username'),

                logout:function () {
                    var _this = this;
                    localStorage.setItem('username',"");
                    location.reload();

                },
                login:function () {
                    var _this = this;
                    console.log(this)
                    window.axios.post("/api/login",$('form').serialize()).then(function (response) {
                        console.log(response);
                        if(response.data.errno==101){
                            _this.$message.error(response.data.result);
                            //_this.username=_this.valueOf();
                        }
                        if(response.data.errno == 0){
                            _this.$message("登陆成功");
                            localStorage.setItem('username',response.data.username);
                            localStorage.setItem('token',response.data.result);
                           // console.log(localStorage.getItem('username'));
                            _this.username = response.data.username;
                        }
                    });
                }
            };
        },


    };
</script>