const submissionComponent = {
  template:
  ` <div style="display: flex; width: 100%">
      <figure class="media-left">
        <img class="image is-64x64"
          :src="submission.submissionImage">
      </figure>
      <div class="media-content">
        <div class="content">
          <p>
            <strong>
              <a :href="submission.url" class="has-text-info">
                {{ submission.title }}
              </a>
              <!-- <span class="tag is-small">#{{ submission.id }}</span> -->
            </strong>

          </p>
        </div>
      </div>
      <div class="media-right">
      <button type="submit" style="background: none;border: none;"><i class="fa fa-chevron-up">
        <span class="icon is-small" @click="upvote(submission.id)">
        <input name="id_atraccio" type="hidden" :value="submission.id">
        </i> <strong class="has-text-info">{{ submission.votes }}</strong>

        </span></button>

      </div>
    </div>`,
  props: ['submission', 'submissions'],
  methods: {
    upvote(submissionId) {
      const submission = this.submissions.find(
        submission => submission.id === submissionId
      );
      submission.votes++;
    }
  }
};

new Vue({
  el: '#app',
  data: {
    submissions: Seed.submissions
  },
  computed: {
    sortedSubmissions () {
      return this.submissions.sort((a, b) => {
        return b.votes - a.votes
      });
    }
  },
  components: {
    'submission-component': submissionComponent
  }
});
