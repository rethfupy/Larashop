<template>
    <div class="error-page my-4">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-12">
                            <!-- Error Inner -->
                            <div class="error-inner">
                                <h2>404</h2>
                                <h5>This page cannot be founded</h5>
                                <p>Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
                                <div class="button">
                                    <RouterLink :to="{ name:'main.index' }" class="btn">Go Homepage</RouterLink>
                                </div>
                            </div>
                            <!--/ End Error Inner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "404"
    }
</script>

<style lang="scss" scoped>

</style>