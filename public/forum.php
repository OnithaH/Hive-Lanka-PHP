<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Forum - HiveLanka</title>
    <link rel="stylesheet" href="../assets/css/forum.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <!-- Header will be included via PHP -->
    <?php include '../includes/header.php'; ?>

    <main class="forum-container">
        <div class="forum-layout">
            <!-- Left Section - Forum Posts -->
            <div class="forum-posts-section">
                <!-- Search and Filter Controls -->
                <div class="forum-controls">
                    <select id="categoryFilter" class="category-dropdown">
                        <option value="">Search by category</option>
                        <option value="crafts-tips">Craft & Tips</option>
                        <option value="website-help">Website Help</option>
                        <option value="general">General Discussion</option>
                        <option value="business">Business advice and ideas</option>
                    </select>
                    
                    <select id="sortBy" class="sort-dropdown">
                        <option value="recent">Most recent</option>
                        <option value="oldest">Oldest</option>
                        <option value="most-comments">Most comments</option>
                        <option value="least-comments">Least comments</option>
                        <option value="most-liked">Most liked</option>
                    </select>
                </div>

                <!-- Posts Container -->
                <div class="posts-container" id="postsContainer">
                    <!-- Posts will be loaded here -->
                </div>

                <!-- Loading indicator for infinite scroll -->
                <div class="loading-indicator" id="loadingIndicator" style="display: none;">
                    <div class="loading-spinner"></div>
                    <p>Loading more posts...</p>
                </div>
            </div>

            <!-- Right Section -->
            <div class="forum-sidebar">
                <!-- User Profile Card -->
                <div class="user-profile-card" id="userProfileCard">
                    <div class="profile-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <span class="username" id="currentUsername">Username</span>
                    <div class="profile-actions">
                        <svg class="edit-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="m18.5 2.5 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </div>
                </div>

                <!-- New Post Section -->
                <div class="new-post-section">
                    <h3>Hey! How's it going ?</h3>
                    <button class="new-post-btn" id="newPostBtn">Tell us what's new with you</button>
                </div>

                <!-- Top Creators -->
                <div class="top-creators">
                    <h3>Top Creators</h3>
                    <div class="creators-list" id="creatorsList">
                        <!-- Creators will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- New Post Modal -->
    <div class="modal-overlay" id="newPostModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create New Post</h2>
                <button class="modal-close" id="closeNewPostModal">&times;</button>
            </div>
            <form id="newPostForm" class="modal-body">
                <div class="form-group">
                    <label for="postTitle">Title</label>
                    <input type="text" id="postTitle" name="title" required maxlength="200">
                </div>
                
                <div class="form-group">
                    <label for="postCategory">Category</label>
                    <select id="postCategory" name="category" required>
                        <option value="">Select a category</option>
                        <option value="crafts-tips">Craft & Tips</option>
                        <option value="website-help">Website Help</option>
                        <option value="general">General Discussion</option>
                        <option value="business">Business advice and ideas</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="postContent">Content</label>
                    <textarea id="postContent" name="content" required rows="6" maxlength="2000"></textarea>
                </div>
                
                <div class="modal-actions">
                    <button type="button" class="btn-secondary" id="cancelNewPost">Cancel</button>
                    <button type="submit" class="btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>

    <!-- User Profile Modal -->
    <div class="modal-overlay" id="userProfileModal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h2>My Profile</h2>
                <button class="modal-close" id="closeProfileModal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- User Info Section -->
                <div class="profile-info-section">
                    <div class="profile-avatar">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="profile-details">
                        <h3 id="profileUsername">Username</h3>
                        <div class="profile-stats">
                            <span>Joined: <strong id="joinDate">January 2024</strong></span>
                            <span>Total Posts: <strong id="totalPosts">0</strong></span>
                            <span>Total Comments: <strong id="totalComments">0</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Posts Section -->
                <div class="profile-section">
                    <h3>My Posts</h3>
                    <div class="profile-posts" id="userPosts">
                        <!-- User posts will be loaded here -->
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="profile-section">
                    <h3>My Comments</h3>
                    <div class="profile-comments" id="userComments">
                        <!-- User comments will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Detail Modal -->
    <div class="modal-overlay" id="postDetailModal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h2 id="postDetailTitle">Post Title</h2>
                <button class="modal-close" id="closePostDetailModal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="post-detail-content">
                    <div class="post-meta">
                        <span class="post-author" id="postAuthor">Author</span>
                        <span class="post-date" id="postDate">Date</span>
                        <span class="post-category" id="postCategory">Category</span>
                    </div>
                    <div class="post-content" id="postDetailContent">
                        <!-- Post content will be loaded here -->
                    </div>
                    <div class="post-actions">
                        <button class="action-btn like-btn" id="postLikeBtn">
                            <span class="like-icon">👍</span>
                            <span id="postLikeCount">0</span>
                        </button>
                        <button class="action-btn dislike-btn" id="postDislikeBtn">
                            <span class="dislike-icon">👎</span>
                            <span id="postDislikeCount">0</span>
                        </button>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="comments-section">
                    <h3>Comments</h3>
                    <form id="newCommentForm" class="comment-form">
                        <textarea id="commentContent" placeholder="Write a comment..." rows="3" maxlength="500" required></textarea>
                        <button type="submit" class="btn-primary">Post Comment</button>
                    </form>
                    <div class="comments-list" id="commentsList">
                        <!-- Comments will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/forum.js"></script>
    
    <!-- Footer will be included via PHP -->
    <?php include '../includes/footer.php'; ?>
</body>
</html>