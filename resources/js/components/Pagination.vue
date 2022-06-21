<template>
    

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li v-for="page in pagination.lastPage" :key="page" class="page-item"><a class="page-link" href="#">{{page}}</a></li>
    
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

</template>

<script>
export default {
    name: 'Pagination',
    props: [
        'pagination'
    ]
}
</script>