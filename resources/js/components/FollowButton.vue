<template>
  <div class="user-section__top--right">
    <a
      :class="buttonColor"
      @click="clickFollow"
    >
      <i
        :class="buttonIcon"
      ></i>
      {{ buttonText }}
    </a>
  </div>
</template>

<script>
  export default {
    props: {
      initialIsFollowedBy: {
        type: Boolean,
        default: false,
      },
      authorized: {
        type: Boolean,
        default: false,
      },
      endPoint: {
        type: String,
      },
    },
    data() {
      return {
        isFollowedBy: this.initialIsFollowedBy,
      }
    },
    computed: {
      buttonColor() {
        return this.isFollowedBy
          ? 'followed-btn'
          : 'follow-btn'
      },
      buttonIcon() {
        return this.isFollowedBy
          ? 'fas fa-user-check'
          : 'fas fa-user-plus'
      },
      buttonText() {
        return this.isFollowedBy
          ? 'フォロー中'
          : 'フォロー'
      },
    },
    methods: {
      clickFollow() {
        if (!this.authorized) {
          alert('フォロー機能はログイン中のみ使用できます')
          return
        }

        this.isFollowedBy
          ? this.unfollow()
          : this.follow()
      },
      async follow() {
        const response = await axios.put(this.endPoint)

        this.isFollowedBy = true
      },
      async unfollow() {
        const response = await axios.delete(this.endPoint)

        this.isFollowedBy = false
      },
    },
  }
</script>


