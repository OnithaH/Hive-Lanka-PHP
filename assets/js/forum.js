// Community Forum JavaScript
class CommunityForum {
    constructor() {
        this.currentPage = 1;
        this.loading = false;
        this.hasMorePosts = true;
        this.currentSort = 'recent';
        this.currentCategory = '';
        this.currentPostId = null;
        
        this.init();
    }

    init() {
        this.bindEvents();
        this.loadInitialData();
        this.setupInfiniteScroll();
    }

    bindEvents() {
        // Modal Events
        document.getElementById('newPostBtn').addEventListener('click', () => this.openNewPostModal());
        document.getElementById('userProfileCard').addEventListener('click', () => this.openUserProfileModal());
        document.getElementById('closeNewPostModal').addEventListener('click', () => this.closeModal('newPostModal'));
        document.getElementById('closeProfileModal').addEventListener('click', () => this.closeModal('userProfileModal'));
        document.getElementById('closePostDetailModal').addEventListener('click', () => this.closeModal('postDetailModal'));
        document.getElementById('cancelNewPost').addEventListener('click', () => this.closeModal('newPostModal'));

        // Form Events
        document.getElementById('newPostForm').addEventListener('submit', (e) => this.handleNewPost(e));
        document.getElementById('newCommentForm').addEventListener('submit', (e) => this.handleNewComment(e));

        // Filter Events
        document.getElementById('categoryFilter').addEventListener('change', (e) => this.handleCategoryFilter(e));
        document.getElementById('sortBy').addEventListener('change', (e) => this.handleSortFilter(e));

        // Close modal when clicking overlay
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    this.closeModal(modal.id);
                }
            });
        });

        // Post interaction events
        document.getElementById('postLikeBtn').addEventListener('click', () => this.handlePostLike());
        document.getElementById('postDislikeBtn').addEventListener('click', () => this.handlePostDislike());
    }

    loadInitialData() {
        this.loadPosts();
        this.loadTopCreators();
        this.loadUserInfo();
    }

    setupInfiniteScroll() {
        const postsContainer = document.getElementById('postsContainer');
        postsContainer.addEventListener('scroll', () => {
            if (postsContainer.scrollTop + postsContainer.clientHeight >= postsContainer.scrollHeight - 100) {
                if (!this.loading && this.hasMorePosts) {
                    this.loadMorePosts();
                }
            }
        });
    }

    // Load Posts
    async loadPosts() {
        try {
            this.loading = true;
            this.showLoadingIndicator(true);
            
            // Simulate API call - replace with actual PHP backend call
            const posts = await this.fetchPosts(1, this.currentSort, this.currentCategory);
            this.renderPosts(posts, true);
            
            this.loading = false;
            this.showLoadingIndicator(false);
        } catch (error) {
            console.error('Error loading posts:', error);
            this.loading = false;
            this.showLoadingIndicator(false);
        }
    }

    async loadMorePosts() {
        if (this.loading || !this.hasMorePosts) return;
        
        try {
            this.loading = true;
            this.showLoadingIndicator(true);
            
            this.currentPage++;
            const posts = await this.fetchPosts(this.currentPage, this.currentSort, this.currentCategory);
            
            if (posts.length === 0) {
                this.hasMorePosts = false;
            } else {
                this.renderPosts(posts, false);
            }
            
            this.loading = false;
            this.showLoadingIndicator(false);
        } catch (error) {
            console.error('Error loading more posts:', error);
            this.loading = false;
            this.showLoadingIndicator(false);
        }
    }

    async fetchPosts(page = 1, sort = 'recent', category = '') {
        // Simulate API call - replace with actual backend endpoint
        const samplePosts = [
            {
                id: 1,
                title: "How to start with wood carving?",
                description: "I'm new to wood carving and looking for beginner tips and tool recommendations.",
                author: "CraftLover23",
                category: "crafts-tips",
                date: "2024-01-15",
                likes: 12,
                dislikes: 2,
                comments: 8,
                content: "I've always been interested in wood carving but don't know where to start. What tools should I buy first? Any good beginner projects?"
            },
            {
                id: 2,
                title: "Website loading slowly - need help",
                description: "My HiveLanka store page is taking too long to load. Any solutions?",
                author: "ShopOwner99",
                category: "website-help",
                date: "2024-01-14",
                likes: 8,
                dislikes: 0,
                comments: 5,
                content: "My products are taking forever to load on my store page. Is there a way to optimize images or improve loading speed?"
            },
            {
                id: 3,
                title: "Best marketing strategies for small business",
                description: "Share your successful marketing tactics for growing a small business.",
                author: "BusinessGuru",
                category: "business",
                date: "2024-01-13",
                likes: 25,
                dislikes: 3,
                comments: 15,
                content: "What marketing strategies have worked best for your small business? I'm looking for cost-effective ways to reach more customers."
            },
            {
                id: 4,
                title: "Monthly craft fair at Colombo",
                description: "Anyone interested in joining next month's craft fair?",
                author: "EventOrganizer",
                category: "general",
                date: "2024-01-12",
                likes: 18,
                dislikes: 1,
                comments: 12,
                content: "We're organizing a monthly craft fair in Colombo. Looking for participants to showcase and sell their handmade items."
            },
            {
                id: 5,
                title: "Traditional Sri Lankan crafts preservation",
                description: "Discussion on preserving our traditional crafting techniques.",
                author: "CultureKeeper",
                category: "crafts-tips",
                date: "2024-01-11",
                likes: 32,
                dislikes: 0,
                comments: 20,
                content: "How can we ensure that traditional Sri Lankan crafts like pottery, weaving, and wood carving are passed down to future generations?"
            }
        ];

        // Filter by category if specified
        let filteredPosts = category ? samplePosts.filter(post => post.category === category) : samplePosts;

        // Sort posts
        switch (sort) {
            case 'oldest':
                filteredPosts.sort((a, b) => new Date(a.date) - new Date(b.date));
                break;
            case 'most-comments':
                filteredPosts.sort((a, b) => b.comments - a.comments);
                break;
            case 'least-comments':
                filteredPosts.sort((a, b) => a.comments - b.comments);
                break;
            case 'most-liked':
                filteredPosts.sort((a, b) => b.likes - a.likes);
                break;
            default: // recent
                filteredPosts.sort((a, b) => new Date(b.date) - new Date(a.date));
        }

        // Simulate pagination
        const startIndex = (page - 1) * 10;
        const endIndex = startIndex + 10;
        
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(filteredPosts.slice(startIndex, endIndex));
            }, 500);
        });
    }

    renderPosts(posts, clearContainer = false) {
        const container = document.getElementById('postsContainer');
        
        if (clearContainer) {
            container.innerHTML = '';
        }

        posts.forEach(post => {
            const postElement = this.createPostElement(post);
            container.appendChild(postElement);
        });
    }

    createPostElement(post) {
        const postDiv = document.createElement('div');
        postDiv.className = 'post-item';
        postDiv.dataset.postId = post.id;
        postDiv.addEventListener('click', () => this.openPostDetail(post));

        postDiv.innerHTML = `
            <div class="post-avatar">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div class="post-content">
                <div class="post-header">
                    <span class="post-author">${post.author}</span>
                    <span class="post-date">${this.formatDate(post.date)}</span>
                </div>
                <div class="post-title">${post.title}</div>
                <div class="post-description">${post.description}</div>
                <div class="post-actions">
                    <button class="action-btn like-btn" onclick="event.stopPropagation(); forum.handleLike(${post.id})">
                        <span class="like-icon">👍</span>
                        <span>${post.likes}</span>
                    </button>
                    <button class="action-btn dislike-btn" onclick="event.stopPropagation(); forum.handleDislike(${post.id})">
                        <span class="dislike-icon">👎</span>
                        <span>${post.dislikes}</span>
                    </button>
                    <span class="comments-count">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        ${post.comments}
                    </span>
                </div>
            </div>
        `;

        return postDiv;
    }

    // Load Top Creators
    async loadTopCreators() {
        const creators = [
            { username: "CraftMaster", totalPosts: 45, totalViews: 1250 },
            { username: "BusinessExpert", totalPosts: 38, totalViews: 980 },
            { username: "CreativeArtist", totalPosts: 32, totalViews: 875 },
            { username: "TechHelper", totalPosts: 28, totalViews: 650 },
            { username: "MarketingPro", totalPosts: 25, totalViews: 540 }
        ];

        this.renderTopCreators(creators);
    }

    renderTopCreators(creators) {
        const container = document.getElementById('creatorsList');
        container.innerHTML = '';

        creators.forEach(creator => {
            const creatorDiv = document.createElement('div');
            creatorDiv.className = 'creator-item';
            creatorDiv.innerHTML = `
                <div class="creator-avatar">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="creator-info">
                    <div class="creator-name">${creator.username}</div>
                    <div class="creator-stats">Total Posts: ${creator.totalPosts} | Total Views: ${creator.totalViews}</div>
                </div>
            `;
            container.appendChild(creatorDiv);
        });
    }

    // Load User Info
    loadUserInfo() {
        // Simulate loading current user info
        const currentUser = {
            username: "CurrentUser123",
            joinDate: "January 2024",
            totalPosts: 12,
            totalComments: 35
        };

        document.getElementById('currentUsername').textContent = currentUser.username;
        document.getElementById('profileUsername').textContent = currentUser.username;
        document.getElementById('joinDate').textContent = currentUser.joinDate;
        document.getElementById('totalPosts').textContent = currentUser.totalPosts;
        document.getElementById('totalComments').textContent = currentUser.totalComments;
    }

    // Modal Functions
    openNewPostModal() {
        this.openModal('newPostModal');
    }

    openUserProfileModal() {
        this.openModal('userProfileModal');
        this.loadUserPosts();
        this.loadUserComments();
    }

    openPostDetail(post) {
        this.currentPostId = post.id;
        
        document.getElementById('postDetailTitle').textContent = post.title;
        document.getElementById('postAuthor').textContent = post.author;
        document.getElementById('postDate').textContent = this.formatDate(post.date);
        document.getElementById('postCategory').textContent = this.getCategoryName(post.category);
        document.getElementById('postDetailContent').textContent = post.content;
        document.getElementById('postLikeCount').textContent = post.likes;
        document.getElementById('postDislikeCount').textContent = post.dislikes;
        
        this.loadPostComments(post.id);
        this.openModal('postDetailModal');
    }

    openModal(modalId) {
        document.getElementById(modalId).classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    closeModal(modalId) {
        document.getElementById(modalId).classList.remove('active');
        document.body.style.overflow = 'auto';
        
        // Reset forms
        if (modalId === 'newPostModal') {
            document.getElementById('newPostForm').reset();
        }
    }

    // Form Handlers
    async handleNewPost(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        const postData = {
            title: formData.get('title'),
            category: formData.get('category'),
            content: formData.get('content')
        };

        try {
            // Simulate API call to create post
            const response = await this.createPost(postData);
            
            if (response.success) {
                this.closeModal('newPostModal');
                this.showNotification('Post created successfully!', 'success');
                this.refreshPosts();
            }
        } catch (error) {
            console.error('Error creating post:', error);
            this.showNotification('Error creating post. Please try again.', 'error');
        }
    }

    async handleNewComment(e) {
        e.preventDefault();
        
        const commentContent = document.getElementById('commentContent').value.trim();
        if (!commentContent) return;

        try {
            const commentData = {
                postId: this.currentPostId,
                content: commentContent
            };

            const response = await this.createComment(commentData);
            
            if (response.success) {
                document.getElementById('commentContent').value = '';
                this.loadPostComments(this.currentPostId);
                this.showNotification('Comment posted successfully!', 'success');
            }
        } catch (error) {
            console.error('Error posting comment:', error);
            this.showNotification('Error posting comment. Please try again.', 'error');
        }
    }

    // Filter Handlers
    handleCategoryFilter(e) {
        this.currentCategory = e.target.value;
        this.currentPage = 1;
        this.hasMorePosts = true;
        this.loadPosts();
    }

    handleSortFilter(e) {
        this.currentSort = e.target.value;
        this.currentPage = 1;
        this.hasMorePosts = true;
        this.loadPosts();
    }

    // Post Interaction Handlers
    async handleLike(postId) {
        try {
            const response = await this.likePost(postId);
            if (response.success) {
                this.updatePostLikes(postId, response.likes, response.dislikes);
            }
        } catch (error) {
            console.error('Error liking post:', error);
        }
    }

    async handleDislike(postId) {
        try {
            const response = await this.dislikePost(postId);
            if (response.success) {
                this.updatePostLikes(postId, response.likes, response.dislikes);
            }
        } catch (error) {
            console.error('Error disliking post:', error);
        }
    }

    async handlePostLike() {
        if (!this.currentPostId) return;
        
        try {
            const response = await this.likePost(this.currentPostId);
            if (response.success) {
                document.getElementById('postLikeCount').textContent = response.likes;
                document.getElementById('postDislikeCount').textContent = response.dislikes;
                
                const likeBtn = document.getElementById('postLikeBtn');
                likeBtn.classList.toggle('active');
                
                const dislikeBtn = document.getElementById('postDislikeBtn');
                dislikeBtn.classList.remove('active');
            }
        } catch (error) {
            console.error('Error liking post:', error);
        }
    }

    async handlePostDislike() {
        if (!this.currentPostId) return;
        
        try {
            const response = await this.dislikePost(this.currentPostId);
            if (response.success) {
                document.getElementById('postLikeCount').textContent = response.likes;
                document.getElementById('postDislikeCount').textContent = response.dislikes;
                
                const dislikeBtn = document.getElementById('postDislikeBtn');
                dislikeBtn.classList.toggle('active');
                
                const likeBtn = document.getElementById('postLikeBtn');
                likeBtn.classList.remove('active');
            }
        } catch (error) {
            console.error('Error disliking post:', error);
        }
    }

    // User Profile Functions
    async loadUserPosts() {
        const userPosts = [
            {
                id: 1,
                title: "My first woodworking project",
                date: "2024-01-10",
                content: "Just finished my first wooden bowl! It's not perfect but I'm proud of it."
            },
            {
                id: 2,
                title: "Tips for small business inventory",
                date: "2024-01-08",
                content: "Here are some inventory management tips that helped my business grow..."
            }
        ];

        this.renderUserPosts(userPosts);
    }

    async loadUserComments() {
        const userComments = [
            {
                id: 1,
                postTitle: "Wood carving techniques",
                date: "2024-01-09",
                content: "Great tips! I'll definitely try the grain-following technique you mentioned."
            },
            {
                id: 2,
                postTitle: "Marketing strategies discussion",
                date: "2024-01-07",
                content: "Social media marketing has worked really well for my craft business too."
            }
        ];

        this.renderUserComments(userComments);
    }

    renderUserPosts(posts) {
        const container = document.getElementById('userPosts');
        container.innerHTML = '';

        if (posts.length === 0) {
            container.innerHTML = '<p>No posts yet.</p>';
            return;
        }

        posts.forEach(post => {
            const postDiv = document.createElement('div');
            postDiv.className = 'user-post-item';
            postDiv.innerHTML = `
                <div class="post-info">
                    <div class="post-title-small">${post.title}</div>
                    <div class="post-date-small">${this.formatDate(post.date)}</div>
                    <div class="post-content-small">${post.content}</div>
                </div>
                <button class="delete-btn" onclick="forum.deleteUserPost(${post.id})">Delete</button>
            `;
            container.appendChild(postDiv);
        });
    }

    renderUserComments(comments) {
        const container = document.getElementById('userComments');
        container.innerHTML = '';

        if (comments.length === 0) {
            container.innerHTML = '<p>No comments yet.</p>';
            return;
        }

        comments.forEach(comment => {
            const commentDiv = document.createElement('div');
            commentDiv.className = 'user-comment-item';
            commentDiv.innerHTML = `
                <div class="comment-info">
                    <div class="post-title-small">On: ${comment.postTitle}</div>
                    <div class="comment-date-small">${this.formatDate(comment.date)}</div>
                    <div class="comment-content-small">${comment.content}</div>
                </div>
                <button class="delete-btn" onclick="forum.deleteUserComment(${comment.id})">Delete</button>
            `;
            container.appendChild(commentDiv);
        });
    }

    // Load Post Comments
    async loadPostComments(postId) {
        const comments = [
            {
                id: 1,
                author: "CommentUser1",
                date: "2024-01-16",
                content: "This is really helpful! Thanks for sharing your experience."
            },
            {
                id: 2,
                author: "CommentUser2",
                date: "2024-01-16",
                content: "I had a similar experience. The key is to start with simple projects first."
            }
        ];

        this.renderPostComments(comments);
    }

    renderPostComments(comments) {
        const container = document.getElementById('commentsList');
        container.innerHTML = '';

        if (comments.length === 0) {
            container.innerHTML = '<p>No comments yet. Be the first to comment!</p>';
            return;
        }

        comments.forEach(comment => {
            const commentDiv = document.createElement('div');
            commentDiv.className = 'comment-item';
            commentDiv.innerHTML = `
                <div class="comment-header">
                    <span class="comment-author">${comment.author}</span>
                    <span class="comment-date">${this.formatDate(comment.date)}</span>
                </div>
                <div class="comment-text">${comment.content}</div>
            `;
            container.appendChild(commentDiv);
        });
    }

    // Delete Functions
    async deleteUserPost(postId) {
        if (confirm('Are you sure you want to delete this post?')) {
            try {
                const response = await this.deletePost(postId);
                if (response.success) {
                    this.showNotification('Post deleted successfully!', 'success');
                    this.loadUserPosts();
                    this.refreshPosts();
                }
            } catch (error) {
                console.error('Error deleting post:', error);
                this.showNotification('Error deleting post. Please try again.', 'error');
            }
        }
    }

    async deleteUserComment(commentId) {
        if (confirm('Are you sure you want to delete this comment?')) {
            try {
                const response = await this.deleteComment(commentId);
                if (response.success) {
                    this.showNotification('Comment deleted successfully!', 'success');
                    this.loadUserComments();
                }
            } catch (error) {
                console.error('Error deleting comment:', error);
                this.showNotification('Error deleting comment. Please try again.', 'error');
            }
        }
    }

    // API Simulation Functions (Replace with actual PHP backend calls)
    async createPost(postData) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve({ success: true, id: Date.now() });
            }, 1000);
        });
    }

    async createComment(commentData) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve({ success: true, id: Date.now() });
            }, 500);
        });
    }

    async likePost(postId) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve({ 
                    success: true, 
                    likes: Math.floor(Math.random() * 50) + 1, 
                    dislikes: Math.floor(Math.random() * 10) 
                });
            }, 300);
        });
    }

    async dislikePost(postId) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve({ 
                    success: true, 
                    likes: Math.floor(Math.random() * 50) + 1, 
                    dislikes: Math.floor(Math.random() * 10) + 1 
                });
            }, 300);
        });
    }

    async deletePost(postId) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve({ success: true });
            }, 500);
        });
    }

    async deleteComment(commentId) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve({ success: true });
            }, 500);
        });
    }

    // Utility Functions
    updatePostLikes(postId, likes, dislikes) {
        const postElement = document.querySelector(`[data-post-id="${postId}"]`);
        if (postElement) {
            const likeCount = postElement.querySelector('.like-btn span:last-child');
            const dislikeCount = postElement.querySelector('.dislike-btn span:last-child');
            
            if (likeCount) likeCount.textContent = likes;
            if (dislikeCount) dislikeCount.textContent = dislikes;
        }
    }

    refreshPosts() {
        this.currentPage = 1;
        this.hasMorePosts = true;
        this.loadPosts();
    }

    showLoadingIndicator(show) {
        const indicator = document.getElementById('loadingIndicator');
        indicator.style.display = show ? 'block' : 'none';
    }

    formatDate(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diffTime = Math.abs(now - date);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if (diffDays === 1) {
            return 'Yesterday';
        } else if (diffDays < 7) {
            return `${diffDays} days ago`;
        } else {
            return date.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric' 
            });
        }
    }

    getCategoryName(category) {
        const categoryNames = {
            'crafts-tips': 'Craft & Tips',
            'website-help': 'Website Help',
            'general': 'General Discussion',
            'business': 'Business advice and ideas'
        };
        
        return categoryNames[category] || category;
    }

    showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        // Style the notification
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '15px 20px',
            borderRadius: '8px',
            color: 'white',
            fontWeight: '500',
            zIndex: '9999',
            transform: 'translateX(400px)',
            transition: 'transform 0.3s ease',
            maxWidth: '300px',
            wordWrap: 'break-word'
        });

        // Set background color based on type
        switch (type) {
            case 'success':
                notification.style.backgroundColor = '#63BD51';
                break;
            case 'error':
                notification.style.backgroundColor = '#800000';
                break;
            default:
                notification.style.backgroundColor = '#666666';
        }

        document.body.appendChild(notification);

        // Show notification
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        // Hide notification after 4 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 4000);
    }
}

// Initialize the forum when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.forum = new CommunityForum();
});