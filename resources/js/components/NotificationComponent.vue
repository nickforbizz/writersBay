<template>
    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
        <em class="fa fa-envelope"></em><span class="label label-danger">{{notifications.length }}</span>
    </a>
        <ul class="dropdown-menu dropdown-messages">



            <li v-for="(notification,index) in notifications" :key="index">
                <div class="dropdown-messages-box"><a href="#" class="pull-left">
                    <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                </a>
                    <div class="message-body"><small class="pull-right">{{ notification.time}}</small>
                        <a href="#">{{ notification.message}}</a>
                        <br /><small class="text-muted">{{ notification.date}}</small></div>
                </div>
            </li>




            <li class="divider"></li>
            <li>
                <div class="all-button"><a href="#">
                    <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                </a></div>
            </li>
        </ul>
    </li></template>

<script>
    export default {
        data: function() {
            return {
                notifications: [
                    {
                        "id":"1",
                        "message":"Halloo there everyone ",
                        "time":"3 minutes ago",
                        "date":"1:24 pm - 25/03/2015"
                    }

        ]
            }
        },

        // mounted() {
        //     console.log('Component mounted.')

            //console.log("Listening")
            // Echo.channel('test_nick')
            //     .listen('AssignmentProgressEvent', (e) => {
            //
            //         console.log("Notifications SmsSendEvent","Received: "+JSON.stringify(e))
            //         this.notifications.push(e)
            //     });
        //
        //
        // }




    }
</script>
