              <div class="card">
                <div class="card-header" id="heading<?php echo get_the_ID(); ?>">
                  <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo get_the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_the_ID(); ?>">
                      <?php the_title(); ?>
                    </button>
                  </h5>
                </div>
            
                <div id="collapse<?php echo get_the_ID(); ?>" class="collapse" aria-labelledby="heading<?php echo get_the_ID(); ?>" data-parent="#accordionFAQ">
                  <div class="card-body">
                    
                    <?php the_content(); ?>

                  </div>
                </div>
              </div>